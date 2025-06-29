document.querySelectorAll('.btn-group button').forEach(btn => {
  btn.addEventListener('click', () => {
    // Remove active class from all buttons
    document.querySelectorAll('.btn-group button').forEach(b => b.classList.remove('active', 'text-primary'));
    // Add active class to clicked button
    btn.classList.add('active', 'text-primary');

    // Hide all data containers
    document.querySelectorAll('.data-container').forEach(div => div.style.display = 'none');
    // Show target container
    const target = btn.getAttribute('data-target');
    document.getElementById(target).style.display = 'block';
  });
});