<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">
                        I'm an example component.
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                users: [],
                user: {
                    id: '',
                    name: '',
                    email: '',
                    role: '',
                    created_at: '',
                    updated_at: '',
                },
                pagination: {}
            }
        },
        created() {
            this.fetchUsers();
        },
        methods: {
            fetchUsers() {
                fetch('api/users')
                    .then(res => res.json())
                    .then(res => {
                        console.log(res.data);
                    })
            }
        }
    }

</script>