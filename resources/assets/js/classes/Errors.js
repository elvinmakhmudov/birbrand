class Errors {
    constructor() {
        this.errors = {};
    }
    get(field) {
        if (Array.isArray(this.errors[field])) {
            return this.errors[field][0];
        }
        return this.errors[field];
    }
    record(errors) {
        this.errors = errors;
    }
    clear(field) {
        delete this.errors[field];
    }
    has(field) {
        return this.errors.hasOwnProperty(field);
    }
    any(){
        return Object.keys(this.errors).length > 0;
    }
}

export default Errors;
