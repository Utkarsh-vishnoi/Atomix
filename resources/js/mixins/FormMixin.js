export default {  
  data() {
    return {
      fields: {},
      errors: {},
      success: false,
      loaded: true,
      action: '',
    }
  },

  methods: {
    submit() {
      if (this.loaded) {
        this.beforeSubmit();
        axios.post(this.action, this.fields).then(response => {
          this.handleSuccess();
        }).catch(error => {
          this.handleError();
        });
      }
    },
    beforeSubmit() {
      this.loaded = false;
      this.success = false;
      this.errors = {};
    },
    handleError() {
      this.loaded = true;
      if (error.response.status === 422) {
        this.errors = error.response.data.errors || {};
      }
    },
    handleSuccess() {
          this.fields = {}; //Clear input fields.
          this.loaded = true;
          this.success = true;
    } 
  }
}