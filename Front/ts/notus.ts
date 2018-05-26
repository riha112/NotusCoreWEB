import {Validator} from './validator';
import {InputController} from './input_controller';

export class Notus {

    protected notusPHP: any;

    constructor() {
        this._init();
    }

    private _init(): void{
        //Main code goes here
        this._initValidator();
        this._initAjaxController();
    }

    /** */
    private _initValidator(): void{
        const inputs = document.querySelectorAll("input[validate]");
        inputs.forEach(input => {
            const validator:Validator = new Validator();
            //TODO: Validate input
        });
    }

    /** */
    private _initNotusPHP(): void{
    }

    /** */
    private _initAjaxController(): void{

    }
}