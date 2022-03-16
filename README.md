# money_lover_stringbin
Ejemplo para stringbin

CREATE VIEW vista_bancos AS SELECT CONCAT(nombre_banco, " - ", tipo_cuenta) AS nombreBancuent, cuentabancos.id, id_user, id_banco, saldo
FROM cuentabancos, bancos WHERE cuentabancos.id_banco = bancos.id_banco 


CREATE VIEW vista_transaccions AS SELECT transaccions.id AS id_transaccion, nombre_banco, tipo_cuenta, nombre_categoria, monto, fecha, tipo_transaccion, nota, id_user
FROM transaccions, bancos, categoria, cuentabancos WHERE transaccions.id_cuenta = cuentabancos.id AND cuentabancos.id_banco = bancos.id_banco
AND transaccions.id_categoria = categoria.id_categoria
