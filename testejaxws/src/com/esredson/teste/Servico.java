package com.esredson.teste;

import javax.jws.WebService;

@WebService(endpointInterface = "com.esredson.teste.IServico")
public class Servico implements IServico{

	@Override
	public String metodo1(String val) throws MinhaException{
		return "testando" + val;
	}
}
