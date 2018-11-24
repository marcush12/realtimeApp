class AppStorage {
    storeToken(token) {//get token
        localStorage.setItem('token', token); //store here
    }

    storeUser(user) {
        localStorage.setItem('user', user);
    }

    store(user, token) { // with this function we call the 2 func above
        this.storeToken(token)
        this.storeUser(user)
    }

    clear() {
        localStorage.removeItem('token')
        localStorage.removeItem('user')
    }

    getToken() {
        return localStorage.getItem('token')
    }

    getUser() {
        return localStorage.getItem('user')
    }
}

export default AppStorage = new AppStorage()
