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

export const remove_cart = () => {
  return {
    type: types.REMOVE_CART
  }
}

export const save_user = (user) => {
  return {
    type: types.SAVE_USER,
    user: user
  }
}

export const save_wish_item = (item) => {
  return {
    type: types.SAVE_WISH_ITEM,
    item: item
  }
}

export const delete_wish_item = (index) => {
  return {
    type: types.DELETE_WISH_ITEM,
    index: index
  }
}

export const show_wish_item = (item) => {
  return {
    type: types.SHOW_WISH,
    item: item
  }
}