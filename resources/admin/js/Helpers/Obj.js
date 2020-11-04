import { pick } from "lodash";

/**
 * Заполняем свойства Дефолтного объекта,
 * @param {Object} defaultPropertiesObject
 * @param {Object} donorObject
 */
const fillDefaultProperties = (defaultPropertiesObject, donorObject) =>
    pick(
        {
            ...defaultPropertiesObject,
            ...donorObject
        },
        Object.keys(defaultPropertiesObject)
    );

/**
 * Заполняем свойства Дефолтного объекта,
 * Это второй вариант, без использования lodash
 * https://stackoverflow.com/questions/38750705/filter-object-properties-by-key-in-es6
 * @param {Object} defaultPropertiesObject
 * @param {Object} donorObject
 */

const fillDefaultPropertiesNative = (defaultPropertiesObject, donorObject) => {
    const data = {
        ...defaultPropertiesObject,
        ...donorObject
    };
    /**
     * оставляем только те ключи, которые есть в объекте defaultPropertiesObject
     */
    return Object.keys(data)
        .filter(key => Object.keys(defaultPropertiesObject).includes(key))
        .reduce((obj, key) => {
            return {
                ...obj,
                [key]: data[key]
            };
        }, {});
};
export { fillDefaultProperties, fillDefaultPropertiesNative };
