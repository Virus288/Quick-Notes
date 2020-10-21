const getNotes = (username) => {
    const GetData = (username) => {
        getProducts(username)
            .then(data => WriteData(data))
            .catch(err => console.log("Rejected: ", err.message))
    }

    const getProducts = async (username) => {
        const Url = '/Controllers/php/products.php?author=' + username;
        const response = await fetch(Url);


        if (response.status !== 200) {
            throw new Error("Seems like page is down. Please try again later");
        }
        const data = await response.json();
        return data;
    }

    const WriteData = (data) => {
        for (let Data in data) {
            console.log(data[Data])
        }
    }

    GetData(username)
}