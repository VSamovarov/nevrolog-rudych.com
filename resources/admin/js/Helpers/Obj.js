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

export { fillDefaultProperties };
