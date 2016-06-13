import MessageHelper from './message'

export default class ResponseHelper {

    static error(response)  {
        let reason = response.data
        let errors = reason.errors

        if (errors) {
            MessageHelper.errors(errors)
        }else{
            MessageHelper.error(reason.message)
        }
    }

}
