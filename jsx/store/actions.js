import * as types from './actions_type';

export const add_cart = (item) => {
  return {
    type: types.ADD_CART,
    item: item
  }
}

export const remove_item_cart = (index) => {
  return {
    type: types.REMOVE_ITEM_CART,
    index: index
  }
}

export const update_cart = (index, qty) => {
  return {
    type: types.UPDATE_CART,
    index: index,
    qty: qty
  }
}

export const save_user = (user) => {
  return {
    type: types.SAVE_USER,
    user: user
  }
}