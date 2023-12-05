import React, { useEffect, useState } from "react";
import "./homepage.css";
import axios from "axios";
import { sendRequest } from "../../core/helpers/request.js";

const Homepage = () => {
  // const [username, setUsername] = useState("");
  // const [password, setPassword] = useState("");

  const [data, setData] = useState({
    username: "",
    password: "",
  });

  const handleLogin = async () => {
    try {
      const response = sendRequest({
        route: "/signin.php",
        methode: "POST",
      });
      const result = response.data;
      console.log(result);
    } catch (error) {
      console.error(error);
    }
  };

  const handleForm = (field, value) => {
    setData((prev) => {
      return {
        [field]: value,
        ...prev,
      };
    });
  };

  useEffect(() => {
    console.log(data);
  }, [data]);

  return (
    <div>
      <h2>Login</h2>
      <input
        type="text"
        placeholder="Username"
        onChange={(e) => handleForm("email", e.target.value)}
      />
      <input
        type="password"
        placeholder="Password"
        onChange={(e) => handleForm("email", e.target.value)}
      />
      <button onClick={handleLogin}>Login</button>
    </div>
  );
};

export default Homepage;
