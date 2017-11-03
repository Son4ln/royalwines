import {combineReducers} from 'redux';
import * as types from './actions_type';

//giỏ hàng
let cart_item = JSON.parse(localStorage.getItem('cart'));

let initCart = cart_item ? cart_item : [];

const rw_cart = (state = initCart, action) => {
  switch (action.type) {
    case types.ADD_CART:
      state = [...state, action.item];
      localStorage.setItem('cart', JSON.stringify(state));
      return [...state];

    case types.REMOVE_ITEM_CART:
      let new_state = state.filter((e, i) => i != action.index);
      localStorage.setItem('cart', JSON.stringify(new_state));
      return new_state;

    case types.UPDATE_CART:
      state[action.index] = {
        ...state[action.index],
        qty: action.qty
      }

      localStorage.setItem('cart', JSON.stringify(state));
      return [...state];

    default: 
      return state;
  }
}
//end giỏ hàng

// save user
let initUser = {};

const rw_user = (state = initUser, action) => {
  switch (action.type) {
    case types.SAVE_USER:
      state = action.user;
      return {...state};
    default: 
      return state;
  }
}

// end save user

//save whish list
let initWishList = [];

const rw_wishList = (state = initWishList, action) => {
  switch (action.type) {
    case types.SHOW_WISH:
      state = [...action.item];
      return [...state]
    case types.SAVE_WISH_ITEM:
      axios.post('/site/controller/controller.php?action=addWish', {
        uid: action.item.uid
      });

      state = [...state, action.item];
      return [...state];

    case types.DELETE_WISH_ITEM:
      let new_state = state.filter((e, i) => i != action.index);
      let product = state[action.index];
      axios.post('/site/controller/controller.php?action=delWish', {
         uid: product.uid
      });
      return new_state;

    default:
      return state;
  }
}

const rw_reducers = combineReducers({
  rw_cart: rw_cart,
  rw_user: rw_user,
  rw_wish: rw_wishList
});

export default rw_reducers;