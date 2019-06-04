export default {  
  data() {
    return {
      fields: {},
      errors: {},
      success: false,
      loaded: true,
      action: '',
      method: 'GET'
    }
  },

  methods: {
    submit() {
      if (this.loaded) {
        this.beforeSubmit();
        axios[this.method.toLowerCase()](this.action, this.fields).then(response => {
          this.handleSuccess();
        }).catch(error => {
          this.handleError(error);
        });
      }
    },
    beforeSubmit() {
      this.loaded = false;
      this.success = false;
      this.errors = {};
    },
    handleError(error) {
      this.loaded = true;
      console.log(error.response);
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