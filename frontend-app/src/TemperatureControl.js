import { useState, useContext } from "react";
import NotificationContext from "./context/NotificationContext";

function TemperatureControl() {
  const [count, setTemp] = useState(10);
  const maxTemp = 30;
  const minTemp = 0;
  const ctx = useContext(NotificationContext);

  const tempUp = () => {
    if (count < maxTemp)
      setTemp(count + 1);
    ctx.success('temp up 1 grade');

  }

  const tempDown = () => {
    if (count > minTemp)
      setTemp(count - 1);
    ctx.success('temp down 1 grade');
  }


  return (
    <div className="app-container">
      <div className="temperature-display-container">
        <div className={`temperature-display ${count >= 15 ? 'hot' : 'cold'}`}>
          <p>{count}</p>
        </div>
      </div>
      <div className="button-container">
        <button onClick={tempUp}>+</button>
        <button onClick={tempDown}>-</button>
      </div>
    </div>
  );

}

export default TemperatureControl;

