import { useState, useRef, useEffect, useContext } from "react";
import NotificationContext from "./context/NotificationContext";

function ToDoList(props) {
   const { save, load } = props;

   const input = useRef('');
   const [items, setItems] = useState(JSON.parse(load()) ?? []);
   const context = useContext(NotificationContext);

   useEffect(() => {
      save(JSON.stringify(items));
   }, [items]);

   const addItem = (e) => {
      e.preventDefault();

      if (input.current.value === '') {
         context.danger('Поле пустое');
         return;
      }

      const newItems = [...items, { value: input.current.value, isDone: false }];
      setItems(newItems);
      input.current.value = '';
      input.current.blur();
      context.success('Добавили дело');
   }

   const toggleComplete = (index) => {
      const newItems = [...items];
      newItems[index].isDone = !newItems[index].isDone;
      setItems(newItems);
      context.success('Дело выполнено');
   }

   const deleteItem = (itemIndex) => {
      const newItems = items.filter((item, index) => index !== itemIndex);
      setItems(newItems);
      context.warning('Удалили дело')
   }

   const deleteAll = () => {
      setItems([]);
      context.danger('Все дела удалены');
   }


   return (
      <div className='root'>
         <h1>Список дел</h1>
         <div className='input-wrapper'>
            <input type='text' name='todo' className='highload0' placeholder='Введите дело' ref={input} />
            <button className='add-button' onClick={addItem}>Добавить</button>
         </div>

         {items?.length > 0 ? (
            <ul className='todo-list'>

               <div className='todo' >
                  {items.map((item, index) => <Item key={index} toggle={() => toggleComplete(index)} deleteItem={() => deleteItem(index)} value={item.value} isDone={item.isDone} />)}
               </div>

            </ul >
         ) : (
            <div className="empty">
               <p>Планируется полежать на диване</p>
            </div>
         )}
         <button className='deleteButton' onClick={deleteAll}>Удалить все</button>
      </div >
   );

   function Item({ value, isDone, toggle, deleteItem }) {
      return (
         <li className={`${isDone ? 'itemIsDone' : ''}`}>
            <input onChange={toggle} className="form-check-input me-1" checked={isDone} type="checkbox" />
            {value}
            <button className='delete-button' onClick={deleteItem}>Удалить</button>
         </li>
      );
   }

}

export default ToDoList;