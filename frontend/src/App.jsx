import { BrowserRouter, Routes, Route } from "react-router-dom";
import Homepage from "./pages/home/homepage";
import PatientPage from "./pages/patient/PatientPage";
import DoctorPage from "./pages/doctor/DoctorPage";
import Admin from "./pages/admin/AdminPage";

function App() {
  return (
    <>
      <BrowserRouter>
        <Routes>
          <Route path="/home" index element={<Homepage />} />
          <Route path="/patient" element={<PatientPage />} />
          <Route path="/doctor" element={<DoctorPage />} />
          <Route path="/admin" element={<Admin />} />
        </Routes>
      </BrowserRouter>
    </>
  );
}

export default App;
