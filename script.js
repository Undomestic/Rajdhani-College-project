// JavaScript for basic interaction
window.onload = () => window.scrollTo(0, 0);

document.addEventListener("DOMContentLoaded", () => {
  const submitBtn = document.querySelector(".submit-btn");
  const trackBtn = document.querySelector(".track-btn");

  submitBtn?.addEventListener("click", () => {
    alert("Redirecting to Submit Request...");
    // window.location.href = "submit.html";
  });

  trackBtn?.addEventListener("click", () => {
    alert("Redirecting to Track Request...");
    // window.location.href = "track.html";
  });
});
