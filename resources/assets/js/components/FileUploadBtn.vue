<template>

    <div class="file-upload">
        <input  v-bind:id="name" v-bind:name="name" type="file" class="vue-file-upload" />
        <label v-bind:for="name" class="btn btn-normal btn-type-1">
            <i class="file-progress" v-bind:style="{ width: uploadProgress + '%' }"></i>
            <span><i class="fa fa-upload" aria-hidden="true"></i> Загрузить домашнее задание</span>
        </label>
        <!--<div id="output" class="container">{{uploadProgress}}</div>-->
    </div>

</template>

<script>


    import api from '../api';


    export default {
        props:['name'],
        data(){
            return{
                uploadProgress: false
            }
        },

        computed:{

        },

        methods: {



        },

        mounted(){

//            let inputs = document.querySelectorAll( '.vue-file-upload' );
//            Array.prototype.forEach.call( inputs, function( input )
//            {
//                let label	 = input.nextElementSibling;
//                let labelVal = label.innerHTML;
//
//                input.addEventListener( 'change', function( e )
//                {
//                    let fileName = '';
//                    if( this.files && this.files.length > 1 )
//                        fileName = ( this.getAttribute( 'data-multiple-caption' ) || '' ).replace( '{count}', this.files.length );
//                    else
//                        fileName = e.target.value.split( '\\' ).pop();
//
//                    if( fileName )
//                        label.querySelector( 'span' ).innerHTML = fileName;
//                    else
//                        label.innerHTML = labelVal;
//                });
//            });

            let input = document.getElementById( this.name );
            let label	 = input.nextElementSibling;
            let self = this;
            input.addEventListener( 'change', function( e ){

                let fileName = '';
                if( this.files && this.files.length > 1 )
                    fileName = ( this.getAttribute( 'data-multiple-caption' ) || '' ).replace( '{count}', this.files.length );
                else
                    fileName = e.target.value.split( '\\' ).pop();

                if( fileName )
                    label.querySelector( 'span' ).innerHTML = fileName;
                else
                    label.innerHTML = labelVal;


                let data = new FormData();
                data.append('files', this.files[0]);

                let config = {
                    onUploadProgress: function(progressEvent) {
                        self.uploadProgress = Math.round( (progressEvent.loaded * 100) / progressEvent.total );
                    }
                };


                this.uploadProgress = 0;
                api.post('/user/ajax/file-upload', data, config)
                    .then( res => {

                    });

            });

        }
    }
</script>
