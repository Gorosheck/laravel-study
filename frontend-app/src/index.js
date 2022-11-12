import React from 'react';
import ReactDOM from 'react-dom/client';
// import './index.css';
import './todo.css';
import reportWebVitals from './reportWebVitals';
// import TemperatureControl from './TemperatureControl';
import ToDoList from './ToDoList';

const root = ReactDOM.createRoot(document.getElementById('root'));
root.render(
  <React.StrictMode>
    {/* <TemperatureControl /> */}
    <ToDoList />
  </React.StrictMode>
);

reportWebVitals();
