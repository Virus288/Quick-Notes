const getNotes = (username) => {
    const GetData = (username) => {
        getProducts(username)
            .then(data => WriteData(data))
            .catch(err => console.log("Rejected: ", err.message))
    }

    const getProducts = async (username) => {
        const Url = '/Controllers/php/notes.php?author=' + username;
        const response = await fetch(Url);


        if (response.status !== 200) {
            throw new Error("Seems like page is down. Please try again later");
        }
        const data = await response.json();
        return data;
    }

    const WriteData = (data) => {
        let menu = document.querySelector('.notesMenu');
        for (let Data in data) {
            menu.innerHTML +=  '<div class="notes"><textarea  onkeyup="this.style.height=\'24px\'; this.style.height = this.scrollHeight + 12 + \'px\';" style="overflow: hidden; background: #f7e876; text-align: center; border: none; border-bottom: 2px solid grey;">'+ data[Data].title +'</textarea><textarea onkeyup="this.style.height=\'24px\'; this.style.height = this.scrollHeight + 12 + \'px\';" style="overflow: hidden; background: #f7e876; text-align: start; border: none; border-bottom: 2px solid grey;">'+ data[Data].title +'</textarea></div>';
            console.log(data[Data]);
        }
    }

    GetData(username);
}