import camelCase from "lodash/camelCase";
/**
 * Псевдо уникальный индетификатор
 * на базе рандомной строки и времени в микросекундах
 * Пример: zwho4-1605627194417
 */
const uid = () =>
  Math.random()
    .toString(36)
    .slice(-5)
    .concat("-", Date.now());

const moduleNameCase = string => ucFirst(camelCase(string));

const ucFirst = string => {
  if (!string) return string;
  return string[0].toUpperCase() + string.slice(1);
};

export { uid, moduleNameCase, ucFirst };
