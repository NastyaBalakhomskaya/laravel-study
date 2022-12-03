import { useContext } from "react";
import { useDispatch, useSelector } from "react-redux";
import NotificationContext from "./context/NotificationContext";
import { down, getAllItems, up } from "./store/Temp/tempSlice";

function TemperatureControl() {
  const maxTemp = 30;
  const minTemp = 0;
  const ctx = useContext(NotificationContext);
  const count = useSelector(getAllItems);
  const dispatch = useDispatch();

  const tempUp = () => {
    if (count < maxTemp) {
      dispatch(up(1))
      ctx.success('temp up 1 grade');
    }
  }

  const tempDown = () => {
    if (count > minTemp) {
      dispatch(down(1))
      ctx.success('temp down 1 grade');
    }
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

