function formatCurrency(raw) {
  return String(raw).replace(/\B(?=(\d{3})+(?!\d))/g, ',');
}

function renderMainScript(scriptBlock) {
  const script = document.createElement('script');
  script.src = '/public/assets/site/js/main.js';
  scriptBlock.appendChild(script);
}

export {formatCurrency, renderMainScript};