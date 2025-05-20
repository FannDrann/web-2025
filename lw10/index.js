function isPrimeNumber(arr) 
{
    let result = [];
    for (let num of arr)
    {
        if ((num > 0) && (num < 4)) 
        {
            result.push(`${num} простое число`);
            continue;
        }
        if (num <= 0)
        {
            result.push(`${num} не простое число`);
            continue;
        }
        let isPrime = true;
        for (let i = 2; i <= num-1; i++)
        {
            if (num % i === 0)
            {
                isPrime = false;
                break
            }
        }
        if (isPrime) result.push(`${num} простое число`);
        else result.push(`${num} не простое число`);
    }
    return result;
}    

function countVowels(str) {
    vowels = ['а', 'е', 'ё', 'и', 'о', 'у', 'ы', 'э', 'ю', 'я']
    count = 0
    for (let i of str)
    {
        if (vowels.includes(i))
        {
            count += 1
        }
    }
    return count
}


function uniqueElements(array) 
{
    let result = {};
    for (let key of array) 
    {
        result[key] = (result[key] || 0) + 1;
    }
    return result;
}

function mergeObjects(obj1, obj2) 
{
    let result = {};
    
    for (let key in obj1) 
    {
        result[key] = obj1[key];
    }
    
    for (let key in obj2) 
    {
        result[key] = obj2[key];
    }
    
    return result;
}

const nameArray = array => array.map(i => i.name);

function mapObject(obj, callback) 
{
    let result = {};
    for (let key in obj)
    {
        result[key] = callback(obj[key]);
    }
    return result;
}

function genPassword(num)
{
    let result = "";
    let specialchar = ['!', '@', '#', '$', '%', '^', '&', '*', '(', ')'];
    let upperchar = ['Q', 'W', 'E', 'R', 'T', 'Y', 'U', 'I', 'O', 'P'];
    let lowerchar = ['q', 'w', 'e', 'r', 't', 'y', 'u', 'i', 'o', 'p'];
    let digits = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9];
    result += (specialchar[Math.floor(Math.random() * 10)]);
    result += (upperchar[Math.floor(Math.random() * 10)]);    
    result += (lowerchar[Math.floor(Math.random() * 10)]);    
    result += (digits[Math.floor(Math.random() * 10)]);  
    for (let i = 0; i < num-4; i++)
    {
        result += (specialchar[Math.floor(Math.random() * 10)]) || 
        (upperchar[Math.floor(Math.random() * 10)]) ||
        (lowerchar[Math.floor(Math.random() * 10)]) ||   
        (digits[Math.floor(Math.random() * 10)]);        
    }
    return result;
}


function CombiningMapFilter(array, i1, i2) 
{
    let result = array.map(num => num * i1).filter((num => num > i2));
    return result;
}   