import { useEffect, useState } from 'react';

function TemperatureControl() {

   const [count, setCount] = useState(10);

   useEffect(() => {
      document.title = `Сейчас температура ${count} градусов`
   });

   const increase = () => {
      if (count < 30) {
         setCount(count + 1);
      }
   }

   const decrease = () => {
      if (count > 0) {
         setCount(count - 1);
      }
   }

   return (
      <div className="app-container">
         <div className="temperature-display-container">
            <div className={`temperature-display ${count > 15 ? 'hot' : 'cold'}`}>
               {count}°C
            </div>
         </div>
         <div className="button-container">
            <button onClick={increase}>+</button>
            <button onClick={decrease}>-</button>
         </div>
      </div>
   )
}

export default TemperatureControl;