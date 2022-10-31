import { useState } from 'react';

function ToDoList() {
   const [input, setInput] = useState('');
   const [items, setItems] = useState([]);

   const onInputChange = (e) => {
      setInput(e.target.value);
   }

   const addItem = () => {
      if (input !== '') {
         setItems([...input, items]);
         setInput('');
      } else
         return;
   };

   const deleteItem = (text) => {
      const newItems = items.filter((item) => {
         return item !== text;
      });
      setItems(newItems);
   };



   return (
      <div className='root'>

         <h1>Список дел</h1>

         <div className='input-wrapper'>
            <input type='text' name='todo' placeholder='Введите дело' value={input} onChange={onInputChange} />
            <button className='add-button' onClick={addItem}>Добавить</button>
         </div>

         {items?.length > 0 ? (
            <ul className='todo-list'>
               {items.map((item, index) => (
                  <div className='todo' >
                     <input type='checkbox' />
                     <li key={index}> {item} </li>
                     <button className='delete-button'
                        onClick={() => {
                           deleteItem(item);
                        }}
                     >Удалить</button>
                  </div>
               ))}
            </ul >
         ) : (
            <div className="empty">
               <p>Планируется полежать на диване</p>
            </div>
         )}
      </div >
   );
}

export default ToDoList;