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
import { BrowserRouter, Route, Routes } from 'react-router-dom';
import Header from './components/Header';
import Home from './pages/Home';
import About from './pages/About';
import Film from './pages/Film';
import Actors from './pages/Actors';
import Genres from './pages/Genres';
import Footer from './components/Footer';
import { Provider } from 'react-redux';
import store from './store/store';

const root = ReactDOM.createRoot(document.getElementById('root'));
const StorageToDoList = withLocalStorage('todolist', ToDoList);
root.render(
  <React.StrictMode>
    {/* <ToDoList/> */}
    <Provider store={store}>
      <NotificationProvider>
        {/*   <NotificationBar/> */}
        {/* <App /> */}
        <TemperatureControl />
        {/*   <StorageToDoList/>  */}

        {/*       <BrowserRouter>
        <Header />
        <div className='container'>
          <NotificationBar />
          <Routes>
            <Route path='/' element={<Home />} />
            <Route path='/about' element={<About />} />
            <Route path='/films'>
              <Route path=':id' element={<Film />} />
            </Route>
            <Route path='/actors' element={<Actors />} />
            <Route path='/genres' element={<Genres />} />
          </Routes>
        </div>
        <Footer />
      </BrowserRouter> */}
      </NotificationProvider>
    </Provider>
  </React.StrictMode>

);

// If you want to start measuring performance in your app, pass a function
// to log results (for example: reportWebVitals(console.log))
// or send to an analytics endpoint. Learn more: https://bit.ly/CRA-vitals
reportWebVitals();
