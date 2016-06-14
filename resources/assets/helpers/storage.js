export default class StorageHelper {

    static set(key, value) {
        if (Object.prototype.toString.call(value) === '[object Function]') {
            throw new TypeError('Cannot store function')
        }

        if (Object.prototype.toString.call(value) === '[object Object]') {
            value = JSON.stringify(value);
        }

        localStorage[key] = value
    }

    static get(key) {
        let value = localStorage[key]

        try{
            return JSON.parse(value);
        }catch(e) {
            return value;
        }
    }

    static remove(key) {
        delete localStorage[key]
    }

    static clear() {
        localStorage.clear()
    }

}
