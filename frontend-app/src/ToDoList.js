import { useState } from 'react';

function ToDoList() {
   const [input, setInput] = useState('');
   const [items, setItems] = useState([]);

   const onInputChange = (e) => {
      setInput(e.target.value);
   }

   const addItem = (e) => {
      e.preventDefault();

      if (input === '') {
         return;
      }

      const newItems = [...items, { value: input, isDone: false }];
      setItems(newItems);
      setInput('');
   }

   const toggleComplete = (index) => {
      const newItems = [...items];
      newItems[index].isDone = !newItems[index].isDone;
      setItems(newItems);
   }


   const deleteItem = (text) => {
      const newItems = items.filter((item) => {
         return item !== text;
      });
      setItems(newItems);
   };

   const deleteAll = (newItems) => {
      if (items.value !== null) {
         return (newItems = []);
      }
   }




   return (
      <div className='root'>
         <h1>Список дел</h1>
         <div className='input-wrapper'>
            <input type='text' name='todo' className='highload0' placeholder='Введите дело' value={input} onChange={onInputChange} />
            <button className='add-button' onClick={addItem}>Добавить</button>
         </div>

         {items?.length > 0 ? (
            <ul className='todo-list'>

               <div className='todo' >
                  {items.map((item, index) => <Item key={index} toggle={() => toggleComplete(index)} value={item.value} isDone={item.isDone} />)}
               </div>

            </ul >
         ) : (
            <div className="empty">
               <p>Планируется полежать на диване</p>
            </div>
         )}
         <button className='delete-button'
            onClick={() => {
               deleteAll(items);
            }}
         >Удалить все</button>
      </div >
   );

   function Item({ value, isDone, toggle }) {
      return (
         <li className={`${isDone ? 'itemIsDone' : ''}`}>
            <input onChange={toggle} className="form-check-input me-1" checked={isDone} type="checkbox" />
            {value}
            <button className='delete-button'
               onClick={() => {
                  deleteItem(Item);
               }}
            >Удалить</button>
         </li>
      );
   }

}

export default ToDoList;