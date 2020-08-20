<template>
    <div class="history">

           <h2>Histories</h2>
    </div>
</template>


<script>
    export default {
        data(){
            return{
                histories: [],
                history_id: '',
                pagination: {},

            }

        },
        created() {
            this.getHistories();
            console.log(12)
        },
        methods:{
            getHistories:function (url) {
                let v = this;
                url = url || 'api/history';
                axios.get(url).then(response =>{
                    console.log(response);

                }).catch(error =>{
                    console.log(error)
                })
            }
        }

    }
</script>