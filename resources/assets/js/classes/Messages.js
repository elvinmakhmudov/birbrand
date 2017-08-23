class Messages {
    constructor() {
        this.messages = {};
    }
    get(field) {
        if (Array.isArray(this.messages[field])) {
            return this.messages[field][0];
        }
        return this.messages[field];
    }
    record(messages) {
        this.messages = messages;
    }
    clear() {
        delete this.messages;
    }
    any(){
        return this.messages.length > 0;
    }
    purge() {
        this.messages = {}
    }
    all() {
        return this.messages;
    }
}

export default Messages;
