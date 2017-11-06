function formatCurrency(raw) {
  return String(raw).replace(/\B(?=(\d{3})+(?!\d))/g, ',');
}

function renderMainScript(scriptBlock) {
  const script = document.createElement('script');
  script.src = '/public/assets/site/js/main.js';
  scriptBlock.appendChild(script);
}

function isValidName(fullName) {
  let patternName = "^[a-zA-Z " +
    "àáảãạăắằẳẵặâấầẩẫậéèẻẽẹêếềểễệíìỉĩịóòỏõọôốồổỗộơớờởỡợúùủũụưứừửữựýỳỷỹỵđ" +
    "ĐÁÀẢÃẠĂẮẰẲẴẶÂẤẦẨẪẬÉÈẺẼẸẾỀỂỄỆÍÌỈĨỊÓÒỎÕỌỐỒỔỖỘỚỜỞỠỢÚÙỦŨỤỨỪỬỮỰÝỲỶỸỴ]+$";
  let regex = new RegExp(patternName);
  return regex.test(fullName);
}

function isValidPhone(phone) {
  let regex = /^\+?\d{8,}$/;
  return regex.test(phone);
}

function isValidEmail(email) {
  let regex = /^[a-zA-Z0-9]+([._-]?[a-zA-Z0-9]+)*@[a-zA-Z0-9]+(\.[a-zA-Z0-9]+)+$/;
  return regex.test(email);
}

export {formatCurrency, renderMainScript, isValidName, isValidPhone, isValidEmail};