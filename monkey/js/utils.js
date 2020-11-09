const utils = {
    setText(query, text) {
        document.querySelector(query).innerText = text
        console.log(text)
    },
    Validate(condition , queryErrorTag, messageError) {
        if (condition) {
            // query vào vị trí để in lỗi ra màn hình
            utils.setText(queryErrorTag, '')
            // vì đây là điều kiện đúng nên ko hiện gì
            return true
        } else {
            utils.setText(queryErrorTag, messageError)
            // điều kiện sai nên hiện message Error
            return false
        }
    },
    allPassed(validateResult) {
        for (let result of validateResult) {
            if (!result) {
                return false
            }
        }
        return true
    }
}