import { useEffect, useState, useContext } from "react";
import NotificationContext from "./context/NotificationContext";

function TemperatureControl({ save, load, initial = 10 }) {

   const [count, setCount] = useState(parseInt(load() ?? initial));
   const context = useContext(NotificationContext);

   useEffect(() => {
      document.title = `Сейчас температура ${count} градусов`
      save(count);
   });


   const increase = () => {
      setCount(count >= 30 ? 30 : count + 1);
      if (30 > count) {
         context.success('Добавили 1 градус');
         setCount(count >= 30 ? 30 : count + 1);
      } else {
         context.warning('Не добавили');
      }
   }

   const decrease = () => {
      setCount(count ? count - 1 : 0);
      if (count > 0) {
         context.warning('Убавили 1 градус');
         setCount(count ? count - 1 : 0);
      } else {
         context.warning('Не убавили');
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