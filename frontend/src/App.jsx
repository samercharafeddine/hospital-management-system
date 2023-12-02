import { BrowserRouter, Routes, Route } from "react-router-dom";
import Homepage from "./pages/home/homepage";

function App() {
  return (
    <>
      <BrowserRouter>
        <Routes>
          <Route path="/login" element={<Homepage />} />
        </Routes>
      </BrowserRouter>
    </>
  );
}

export default App;
