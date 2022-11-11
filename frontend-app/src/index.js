import React from 'react';
import ReactDOM from 'react-dom/client';
import './index.css';
import App from './App';
import reportWebVitals from './reportWebVitals';
import TemperatureControl from './TemperatureControl';
import ToDoList from './ToDoList';
import withLocalStorage from './withLocalStorage'
import { NotificationProvider } from './context/NotificationContext';
import NotificationBar from './components/NotificationBar';

const root = ReactDOM.createRoot(document.getElementById('root'));
const StorageToDoList = withLocalStorage('todolist', ToDoList);
root.render(
  <React.StrictMode>
   {/* <ToDoList/> */}
   <NotificationProvider>
      <NotificationBar/>
    {/* <App /> */}
    {/*  <TemperatureControl/> */}
      <StorageToDoList/>
    </NotificationProvider>
  </React.StrictMode>
  
);

// If you want to start measuring performance in your app, pass a function
// to log results (for example: reportWebVitals(console.log))
// or send to an analytics endpoint. Learn more: https://bit.ly/CRA-vitals
reportWebVitals();
