import axios from 'axios';
import $ from 'jquery';




export default axios.create({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});