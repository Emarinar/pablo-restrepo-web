(() => {
  const burger = document.getElementById('burger');
  const nav = document.getElementById('nav');
  if (!burger || !nav) return;

  burger.addEventListener('click', () => {
    const open = nav.style.display === 'flex';
    nav.style.display = open ? 'none' : 'flex';
    nav.style.flexDirection = 'column';
    nav.style.position = 'absolute';
    nav.style.right = '20px';
    nav.style.top = '70px';
    nav.style.background = '#fff';
    nav.style.border = '1px solid #eee';
    nav.style.padding = '14px';
    nav.style.borderRadius = '14px';
    nav.style.boxShadow = '0 18px 40px rgba(0,0,0,.12)';
    burger.setAttribute('aria-expanded', String(!open));
  });
})();