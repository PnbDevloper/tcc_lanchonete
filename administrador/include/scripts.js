function toggleLinks() {
  const additionalLinks = document.getElementById('additionalLinks');
  const arrow = document.querySelector('.arrow-down');

  if (additionalLinks.style.display === 'none') {
    additionalLinks.style.display = 'block';
    arrow.style.transform = 'rotate(180deg)';
  } else {
    additionalLinks.style.display = 'none';
    arrow.style.transform = 'rotate(0deg)';
  }
}
