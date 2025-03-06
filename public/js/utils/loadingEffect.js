function loadingEffect() {
  const content = document.getElementById("body_content");
  const loading = document.getElementById("loading_ui");

  if (!content || !loading) {
    console.error("Element not found: body_content or loading_ui");
    return;
  }

  setTimeout(() => {
    content.classList.remove("hidden");
    loading.classList.add("hidden");
  }, 800);
}

export default loadingEffect;
