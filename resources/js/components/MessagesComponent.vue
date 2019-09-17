<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Mensagens Socket</div>
                    <div class="card-body">
                        <ul>
                            <li v-for="item in messages">{{ item.message }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {

        data(){
            return {
                messages: [],
            }
        },

        mounted() {
            Echo.channel('laravel_database_messages')
                .listen('.newMessage', (message) => {
                    console.log(message);
                    this.messages.push(message);
                });
        }
    }
</script>
