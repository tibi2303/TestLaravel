<template>
    <div class="root">
        <div class="card mt-5">
            <h5 class="card-header">{{user.name}}</h5>
            <div class="card-body">
                <p class="card-text">User email: {{user.email}}</p>
                <p class="card-text">User role: {{user.role}}</p>
                <p class="card-text">This user was created at : {{user.created_at}} and updated at {{user.updated_at}} </p>
                <a href="#" class="btn btn-primary" @click="chatUser()">Ask him a question</a>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            user: []
        }
    },
    created() {
        this.fetchUser(this.$route.params.userId);
    },
    methods: {
        fetchUser(userId) {
            let vm = this;
            console.log(userId);
            axios.get('api/user/view/', {params: {id: userId}})
                .then((response) => {
                    vm.user = response.data;
                })
        }
    }
}
</script>
