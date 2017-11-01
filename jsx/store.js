import rw_reducers from './store/reducers';
import {createStore} from 'redux';

let store = createStore(rw_reducers);

export default store;
