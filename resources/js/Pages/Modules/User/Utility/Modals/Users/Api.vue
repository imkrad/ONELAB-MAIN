<template>
    <b-modal v-model="showModal" hide-footer header-class="p-3 bg-light" title="API Key" class="v-modal-custom" modal-class="zoomIn" centered no-close-on-backdrop>
        <div v-if="user">
            <div class="mt-1 mb-n3">
                 <div class="col-md-12 mt-2">
                    <div class="form-group">
                        <label>Api Key:</label>
                        <div class="position-relative auth-pass-inputgroup mb-3">
                                <input :type="(!showPassword) ? 'password' : 'text'" v-model="token" class="form-control pe-5" placeholder="Generate new Token"
                                id="password-input" />
                                <b-button @click="toggle" variant="link" class="position-absolute end-0 top-0 text-decoration-none text-muted"
                                type="button" id="password-addon">
                                <i class="ri-eye-fill align-middle"></i>
                                </b-button>
                                <div class="invalid-feedback">
                                <span></span>
                                </div>
                            </div>
                    </div>
                </div>
                 <div class="col-md-12 mt-4 mb-4">
                    <div class="d-grid gap-2" >
                        <b-button @click="submit()" type="button" variant="success">Generate Key</b-button>
                        <b-button @click="revoke()" type="button" variant="danger">Revoke Key</b-button>
                    </div>
                </div>
            </div>
        </div>
    </b-modal>
</template>
<script>
export default {
    data(){
        return {
            currentUrl: window.location.origin,
            user: {},
            form: {},
            token: null,
            type: null,
            showModal: false,
            showPassword: false
        }
    },
    methods: { 
        show(data){
            this.user = data;
            this.showModal = true;
        },
        submit(){
            axios.get(this.currentUrl + '/utility/users',{
                params : {
                    id: this.user.id,
                    url: this.currentUrl,
                    option: 'token'
                }
            })
            .then(response => {
                this.token = response.data;
            })
            .catch(error => {
                if (error.response.status == 422) {
                    this.errors = error.response.data.errors;
                }
            });
        },
        revoke(){
             this.form = this.$inertia.form({
                id: this.user.id,
                type: 'revoke',
                editable: true
            })

            this.form.put('/utility/users',{
                preserveScroll: true,
                onSuccess: (response) => {
                    this.hide();
                },
            });
        },
        toggle(){
            if(this.showPassword){
                this.showPassword = false;
            }else{
                this.showPassword = true;
            }
        },
        hide(){
            this.user = {};
            this.showModal = false;
        }
    }
}
</script>