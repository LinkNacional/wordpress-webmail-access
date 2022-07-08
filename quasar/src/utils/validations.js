const hexaColorPattern = /^#(([0-9a-fA-F]{2}){3}|([0-9a-fA-F]){3})$/

export const required = val => !!val || 'Campo obrigatório'
export const selectRequired = val => val.length > 0 || 'É necessário selecionar ao menos um valor'
export const priceValue = val => (val && val !== '0,00') || 'É necessário inserir um valor'
export const hexaLength = val => val.length === 7 || 'É necessário que o hexadecimal tenha 6 caracteres'
export const hexaColor = val => hexaColorPattern.test(val) || 'Insira uma cor em hexadecimal válida'
export const positive = val => val >= 0 || 'Insira um valor maior ou igual a 0'
export const todayOrBeyondDate = val => (!!val && val.length === 10 && isTodayOrBeyondDate(val)) || 'Insira uma data válida e maior que a data atual'
export const emailValidation = val => (validateEmail(val)) || 'Insira um endereço de e-mail válido'
export const phoneValidation = val => (!!val && val.length === 14) || 'Insira um número de telefone válido'

function todayDate () {
  const today = new Date()
  return ('' + today.getDate()).padStart(2, '0') + '/' + ('' + (today.getMonth() + 1)).padStart(2, '0') + '/' + today.getFullYear()
}

function isTodayOrBeyondDate (date) {
  const [d, m, y] = date.split('/')
  const [cd, cm, cy] = todayDate().split('/')

  if (d > 31 || m > 12 || y <= 0) {
    return false
  } else {
    return y > cy || (m > cm && y === cy) || (d >= cd && y === cy && m === cm)
  }
}

function validateEmail (email) {
  const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
  return re.test(String(email).toLowerCase())
}
