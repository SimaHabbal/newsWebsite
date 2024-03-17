const form = document.getElementById("add-news-form");

form.addEventListener("submit", async (event) => {
  event.preventDefault();

  const title = document.getElementById("title").value;
  const content = document.getElementById("content").value;

  const formData = new FormData();
  formData.append("title", title);
  formData.append("content", content);

  try {
    const response = await fetch("./backend/addNews.php", {
      method: "POST",
      body: formData,
    });
    let data = await response.json();
    console.log(data);

  } catch (error) {
    console.error("Failed to add news:", error);
  }
});


const loadNews = async () => {
    try {
      const response = await fetch('./backend/getNews.php');
      const data = await response.json();
      console.log(data);
        const newsList = data.map(news => `<li>${news.title} - ${news.content}</li>`).join('');
      container.innerHTML = `<ul>${newsList}</ul>`;
    } catch (error) {
      console.error('Failed to load news:', error);
    }
  };
  
