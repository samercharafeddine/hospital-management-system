import axios from "axios";

axios.defaults.baseURL =
  "http://localhost/FSW2526/hospital-management-system/backend/";

const sendRequest = async ({ route, body, method = "GET" }) => {
  try {
    const response = await axios.request({
      url: route,
      method,
      data: body,
      headers: {
        "Content-Type": "application/x-www-form-urlencoded",
        Authorization: localStorage.getItem("token"),
      },
    });

    return response.data;
  } catch (error) {
    console.log(error);
  }
};

export { sendRequest };
