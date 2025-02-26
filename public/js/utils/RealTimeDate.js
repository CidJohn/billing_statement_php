function RealTimeDate() {
  const divCont = document.getElementById("datetime");

  const container = document.createElement("div");

  const updateDate = () => {
    const now = new Date();
    const formatDate = now.toLocaleString("en-US", {
      weekday: "long",
      year: "numeric",
      month: "long",
      day: "numeric",
      hour: "2-digit",
      minute: "2-digit",
      second: "2-digit",
      hour12: true,
    });
    container.textContent = formatDate;
    divCont.appendChild(container);
  };

  updateDate();

  setInterval(updateDate, 1000);
}

export default RealTimeDate;