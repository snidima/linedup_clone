import axios from 'axios';
import $ from 'jQuery'




export default axios.create({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});