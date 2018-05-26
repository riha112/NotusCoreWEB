interface ILimiter {
    parent: HTMLElement;
    input: HTMLElement;
    limiter: Element;
    limit: Number;
}

export class InputController {

    constructor() {
        this._initLimiter();
    }

    private _initLimiter(): void {
        const limiters = document.querySelectorAll(".form-field .limit");
        limiters.forEach(limiter => {
            const parent = limiter.parentElement;
            if(parent){
                const input = parent.querySelector("input[data-max]");
                if(input){
                    const OLimiter: ILimiter = {
                        parent: parent,
                        limiter: limiter,
                        input: input,
                        limit: input.getAttribute("data-max")
                    }
                    input.addEventListener("change paste keyup", () =>{
                        
                    });
                }
            }
        });
    }

    private updateLimiter(limiter:ILimiter): void{
        const inputText: string = limiter.input.textContent as string;
        const textLength: number = inputText.length;
        const charactersLeft: number = limiter.limit as number - textLength;

        limiter.limiter.innerHTML = String( charactersLeft );
    }

}